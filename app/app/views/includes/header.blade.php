<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">TMA</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li @if(isset($page)&&$page=="home")class="active"@endif><a href="{{URL::to("/")}}/home">Home</a></li>
        <li @if(isset($page)&&$page=="org")class="active"@endif><a href="{{URL::to('/')}}/org">Orgnisation</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Projects <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{URL::to("/")}}/pro/add">Add</a></li>
           <li><a href="{{URL::to("/")}}/pro/list">List</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tasks <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{URL::to('/')}}/task/add">Add</a></li>
            <li><a href="{{URL::to('/')}}/task/list">List</a></li>           
          </ul>
        </li>
    
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{URL::to('/')}}/signout">Sign out</a></li>
           
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>